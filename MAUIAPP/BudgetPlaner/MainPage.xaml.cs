using BudgetPlaner.Models;
using BudgetPlaner.Services;
using BudgetPlaner.Views;
using System.Collections.ObjectModel;

namespace BudgetPlaner
{
    public partial class MainPage : ContentPage
    {
        private readonly ApiService _apiService = new();
        public ObservableCollection<Finance> Finances { get; set; } = new();

        public MainPage()
        {
            InitializeComponent();
        }

        private async void OnTokenPageClicked(object sender, EventArgs e)
        {
            await Navigation.PushAsync(new TokenPage());
        }

        private async void OnFinanzenPageClicked(object sender, EventArgs e)
        {
            await Navigation.PushAsync(new FinanzenPage());
        }








    }

}
