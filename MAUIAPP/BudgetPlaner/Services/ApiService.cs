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

            return result;
        }



        
    }
}
