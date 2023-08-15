// This is a personal academic project. Dear PVS-Studio, please check it.
// PVS-Studio Static Code Analyzer for C, C++, C#, and Java: https://pvs-studio.com
#include<iostream>
using namespace std;
int main(){
    int n,size;
    char *z,*y,x[size];
    cout<<"enter size";
    cin>>size;
    cout<<"enter characters";
    for(int i=0;i<size;i++)
	cin>>x[i];
    for(int k=0;k<size/2;k++)
    z=&x[k];
    for(int j=size-1;j>=size/2;j--)
    {
	y=&x[j];}
    for(int l=0;l<size/2;l++)
    {if(*z==*y)
	continue;
    else
    {
	cout<<"It not a palindrome";
    break;}
	}
	cout<<"It is a palindrome";
    return 0;
}