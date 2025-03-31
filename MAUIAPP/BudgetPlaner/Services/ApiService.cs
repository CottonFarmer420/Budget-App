using BudgetPlaner.Models;
using System;
using System.Collections.Generic;
using System.Net.Http.Headers;
using System.Text.Json;
using System.Threading.Tasks;

namespace BudgetPlaner.Services
{
    public class ApiService
    {
        private readonly string UrlBudget = "https://scharler.swpp.rasser.eu/api/budgets";

        // Methode um Finanzen zu bekommen und die Ausgaben zu laden
        public async Task<List<Budget>> GetFinanzenAsync()
        {
            List<Budget> result = new();

            var token = Preferences.Get("api_token", "");
            if (string.IsNullOrWhiteSpace(token)) return result;

            var client = new HttpClient();
            client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Bearer", token);
            client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));

            // Hole die Budgets
            var response = await client.GetAsync(UrlBudget);
            var json = await response.Content.ReadAsStringAsync();

            if (response.IsSuccessStatusCode)
            {
                var options = new JsonSerializerOptions { PropertyNameCaseInsensitive = true };
                result = JsonSerializer.Deserialize<List<Budget>>(json, options) ?? new();
            }
            else
            {
                throw new Exception($"Fehler: {response.StatusCode}\n{json}");
            }

            // Hole die Ausgaben für jedes Budget
            foreach (var budget in result)
            {
                await GetExpensesForBudgetAsync(budget.Id); // Holen der Ausgaben für jedes Budget
            }

            return result;
        }

        // Methode um Ausgaben für das angegebene Budget zu holen
        public async Task<List<Expense>> GetExpensesForBudgetAsync(int budgetId)
        {
            var expensesUrl = $"https://scharler.swpp.rasser.eu/api/budgets/{budgetId}"; // Dynamische URL für Ausgaben

            var token = Preferences.Get("api_token", "");

            var client = new HttpClient();
            client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Bearer", token);
            client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));

            var response = await client.GetAsync(expensesUrl);
            var json = await response.Content.ReadAsStringAsync();

            if (response.IsSuccessStatusCode)
            {
               
                try
                {
                    var options = new JsonSerializerOptions { PropertyNameCaseInsensitive = true };
                    var expenses = JsonSerializer.Deserialize<List<Expense>>(json, options); // Deserialisieren der Ausgaben
                                                                                             // Hier kannst du die Ausgaben den jeweiligen Budgets zuweisen oder weiterverarbeiten
                    return expenses;
                }
                catch (Exception)
                {
                    return new();
                }
    
            }
            else
            {
                throw new Exception($"Fehler: {response.StatusCode}\n{json}");
            }


        }
    }
}
