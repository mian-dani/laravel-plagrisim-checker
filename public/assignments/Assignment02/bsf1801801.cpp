// This is a personal academic project. Dear PVS-Studio, please check it.
// PVS-Studio Static Code Analyzer for C, C++, C#, and Java: https://pvs-studio.com
#include<iostream>
using namespace std;
main()
{
   char arr[5];
   char *ptr1,*ptr2;
   int i,j,size;
   cout<<"enter the characters"<<endl;
   for(i=0;i<5;i++)
   {
       cin>>arr[i];
   }
   ptr1=arr;
   ptr2=&arr[4];
   for(int i=0,j=4;i<2,j>2;i++,j--)
   {
       if(*ptr1++==*ptr2--)
       continue;
       else
       cout<<"the word is not palindrome";
       break;
   }
   cout<<"palindrome";
    
}