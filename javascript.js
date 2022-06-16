function prodTypeSelection(){
    let x=document.getElementById("productType"); 
    if (x==="dvd"){
        document.write("<label for='size'>Size (MB)</label> <input type='text' id='size'>");
        
    }else{
        alert("Error");
    }
}
