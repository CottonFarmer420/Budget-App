using BudgetPlaner.Models;
using BudgetPlaner.Services;
using System.Collections.ObjectModel;

namespace BudgetPlaner.Views;

public partial class FinanzenPage : ContentPage
{
    private readonly ApiService _apiService = new();
    public ObservableCollection<Finance> Finanzen { get; set; } = new();

    public FinanzenPage()
	{
		InitializeComponent();
        BindingContext = this;
      
    }

    protected override async void OnAppearing()
    {
        base.OnAppearing();
        await DisplayAlert("Check", "FinanzenPage wird angezeigt!", "OK");
        await LadeDaten();
    }

    private async Task LadeDaten()
    {
        try
        {
            var daten = await _apiService.GetFinanzenAsync();
            await DisplayAlert("Debug", $"Geladen: {daten.Count}", "OK");

            Finanzen.Clear();
            foreach (var f in daten)
                Finanzen.Add(f);
        }
        catch (Exception ex)
        {
            await DisplayAlert("Fehler", ex.Message, "OK");
        }
    }
}
