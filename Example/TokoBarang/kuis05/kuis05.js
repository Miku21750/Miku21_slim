function fibonaci(input)
{   
    
    if(input<2){
        return input;
    }else{
      return fibonaci(input-1) + fibonaci(input-2)
    }
}
for(let i = 0; i < 8; i++) 
{
    console.log(fibonaci(i));
}