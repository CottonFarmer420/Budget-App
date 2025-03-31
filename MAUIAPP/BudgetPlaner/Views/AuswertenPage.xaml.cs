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

    public async Task LoadBudget()
    {
        var daten = await _apiService.GetFinanzenAsync();
        foreach (Budget e in daten)
        {
           Budgets.Add(e);
        }
    }

    private async Task LadeDaten()
    {

        await LoadBudget();
        try
        {
            foreach (var e in Budgets)
            {
                var finanzen = await _apiService.GetExpensesForBudgetAsync(e.Id);
                
                foreach (var budget in finanzen)
                {
                    e.Expenses.Add(budget);
                }
            }
        }
        catch (Exception ex)
        {
            await DisplayAlert("Fehler", ex.Message, "OK");
        }
    }
}
