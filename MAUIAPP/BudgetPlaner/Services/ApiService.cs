using BudgetPlaner.Models;
using RestSharp;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http.Headers;
using System.Text;
using System.Text.Json;
using System.Threading.Tasks;

namespace BudgetPlaner.Services;

public class ApiService
{
    private readonly string baseUrl = "https://scharler.swpp.rasser.eu/api/finances";

    public async Task<List<Finance>> GetFinanzenAsync()
    {
        List<Finance> result = new();

        var token = Preferences.Get("api_token", "");
        if (string.IsNullOrWhiteSpace(token)) return result;

        var client = new HttpClient();
        client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Bearer", token);
        client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));

        var response = await client.GetAsync(baseUrl);
        var json = await response.Content.ReadAsStringAsync();

        if (response.IsSuccessStatusCode)
        {
            var options = new JsonSerializerOptions { PropertyNameCaseInsensitive = true };
            result = JsonSerializer.Deserialize<List<Finance>>(json, options) ?? new();
        }
        else
        {
            throw new Exception($"Fehler: {response.StatusCode}\n{json}");
        }

        return result;
    }
}

