// Main function of the C++ program.

#include <iostream>
using namespace std;
int main()
{
    int start,end;
    cin>>start;
    cin>>end;

    cout<<"Even numbers in the given range from "<<start<<" to "<<end<<" are: "<<endl;
    for(int i=start;i<=end;i++)
    {
        if(i%2==0)
        {
            cout<<i<<endl;
        }
    }

    return 0;
}

