// This is a personal academic project. Dear PVS-Studio, please check it.
// PVS-Studio Static Code Analyzer for C, C++, C#, and Java: https://pvs-studio.com
#include <iostream>
using namespace std;
main()
{
    char arr[5];
    char *ptr1;
    char *ptr2;
    ptr1=arr;
    ptr2=&arr[4];
    int i,j;
    
    for(i=0;i<5;i++)
    cin>>arr[i];
      for(i=0, j=4; i<2, j>2; i++, j--)
    {
        if(*ptr1++==*ptr2--)
        continue;
        else
        cout<<"not p";
        break;
    }
    cout<<"p";
}