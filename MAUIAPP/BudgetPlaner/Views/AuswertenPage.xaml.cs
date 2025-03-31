using BudgetPlaner.Models;
using BudgetPlaner.Services;
using System.Collections.ObjectModel;

namespace BudgetPlaner.Views;

public partial class AuswertenPage : ContentPage
{
    private readonly ApiService _apiService = new();
    public ObservableCollection<Budget> Budgets { get; set; } = new();

    public AuswertenPage()
	{
		InitializeComponent();
        BindingContext = this;
    }

    protected override async void OnAppearing()
    {
        base.OnAppearing();
        await LadeDaten();
    }

    private async Task LadeDaten()
    {
        try
        {
            var daten = await _apiService.GetFinanzenAsync();

            foreach (var budget in daten)
            {
                Budgets.Add(budget);
            }

        }
        catch (Exception ex)
        {
            await DisplayAlert("Fehler", ex.Message, "OK");
        }
    }
}
