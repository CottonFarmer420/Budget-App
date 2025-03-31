namespace BudgetPlaner.Views;

public partial class TokenPage : ContentPage
{
	public TokenPage()
	{
		InitializeComponent();
        TokenEntry.Text = Preferences.Get("api_token", "");
    }

    private async void OnSaveClicked(object sender, EventArgs e)
    {
        Preferences.Set("api_token", TokenEntry.Text);
        await DisplayAlert("Gespeichert", "Token gespeichert!", "OK");
        await Navigation.PushAsync(new AuswertenPage());
    }
}
