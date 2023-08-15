// Main function of the C++ program.

#include <iostream>
using namespace std;
int main ()
{ int x,y ;
cout << "Enter the lowest value";
cin >> x ;
cout << "Enter the highest value of a range";
cin >> y;
if (x%2!=0)
{ x ++;
}
while (x <=y )
{ cout << x;
x = x+2;
}
return 0;
}
