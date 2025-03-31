using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BudgetPlaner.Models;

public class Budget
{
    public int Id { get; set; }
    public double Amount { get; set; }

    public List<Expense> Expenses { get; set; }
}
