// Main function of the C++ program.

#include<iostream>
using namespace std;
int main()
{
    int min,max;
    cout<<"Enter the minimum range : ";
    cin>>min;
    cout<<"Enter the maximum range : ";
    cin>>max;
    for(int i=min;i<=max;i++)
    {
        if((i%2==0))
        {cout<<i<<endl;
        }
    }
    return 0;
}
