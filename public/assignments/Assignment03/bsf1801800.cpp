// This is a personal academic project. Dear PVS-Studio, please check it.
// PVS-Studio Static Code Analyzer for C, C++, C#, and Java: https://pvs-studio.com
#include<iostream>
using namespace std;
int main()
{
    int i,j;
    char array[5],*ptr1,*ptr2;
    cout<<"enter the char:";
    cin>>array;
    for(int i=0;i<5;i++)
    cin>>array[i];
    ptr1=array;
    ptr2=&array[4];
    for(i=0, j=4;i<2,j>2;i++,j--)
    {
      if(*ptr1++==*ptr2--) 
      continue;
      else
      cout<<"not palindrome"<<endl;
    }
     cout<<"palindrome"<<endl;
}