#include<iostream>
using namespace std;
int main()
{
	int i,a,f;
	cout<<"Enter lower range of even numbers=";
	cin>>a;
	cout<<"Enter upper range of even numbers=";
	cin>>f;
	for(i=a;i<=f;i+=2)
	{
		cout<<i<<"\n";
		cout<<"All even numbers from lower range to higher range are:";
	}
	return 0;
	
}