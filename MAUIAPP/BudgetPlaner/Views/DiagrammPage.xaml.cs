using BudgetPlaner.Models;
using BudgetPlaner.Services;
using Syncfusion.Maui.Charts;
using System.Collections.ObjectModel;

namespace BudgetPlaner.Views;

public partial class DiagrammPage : ContentPage
{
    private readonly ApiService _apiService = new();

    public ObservableCollection<ChartData> BudgetSeries { get; set; } = new();
    public ObservableCollection<ChartData> ExpenseSeries { get; set; } = new();

    public ObservableCollection<Budget> Budgets { get; set; } = new();
    public DiagrammPage()
    {
        InitializeComponent();
        BindingContext = this;

    }

        protected override async void OnAppearing()
        {
            base.OnAppearing();
            await LadeDaten();
            LadeChartDaten();
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

    private void LadeChartDaten()
    {
        BudgetSeries.Clear();
        ExpenseSeries.Clear();

        foreach (var budget in Budgets)
        {
            double totalExpenses = budget.Expenses?.Sum(e => e.Amount) ?? 0;

            BudgetSeries.Add(new ChartData
            {
                Label = $"Budget {budget.Id}",
                Value = budget.Amount
            });

            ExpenseSeries.Add(new ChartData
            {
                Label = $"Budget {budget.Id}",
                Value = totalExpenses
            });
        }
    }
}

public class ChartData
{
     public string Label { get; set; }
    public double Value { get; set; }
}
