using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BudgetPlaner.Models;

public class Expense
{
    public int Id { get; set; }
    public int Budget_Id { get; set; }
    public string Category { get; set; }
    public double Amount { get; set; }
}
