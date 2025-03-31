using BudgetPlaner.Models;
using BudgetPlaner.Services;
using BudgetPlaner.Views;
using System.Collections.ObjectModel;

namespace BudgetPlaner
{
    public partial class MainPage : ContentPage
    {
        public MainPage()
        {
            InitializeComponent();
        }

        private async void OnTokenPageClicked(object sender, EventArgs e)
        {
            await Navigation.PushAsync(new TokenPage());
        }

        private async void OnAuswertenPageClicked(object sender, EventArgs e)
        {
            await Navigation.PushAsync(new AuswertenPage());
        }








    }

}
