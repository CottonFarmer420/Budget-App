using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BudgetPlaner.Models;

public class Finance
{
    public int Id { get; set; }
    public double Monthly_income { get; set; }
    public double Fixed_costs { get; set; }
    public double Variable_costs { get; set; }
    public double Saving_amount { get; set; }
    public string Saving_target { get; set; }
    public double Debts { get; set; }

    public Finance()
    {
        
    }
}
