

const app = document.getElementById("productlist");

const container = document.createElement("div"); 
container.setAttribute("class", "container"); 
app.appendChild(container);

//Request for data from server

const card = document.createElement("div"); 
card.setAttribute("class", "card"); 

const checkbox = document.createElement("input");
checkbox.setAttribute("type", "checkbox"); 
checkbox.setAttribute("id", "delete-chechbox")



const sku = document.createElement("h4"); //SKU 
sku.textContent = product.sku; 

const name = document.createElement("h4"); //name
name.textContent = product.name;

const price = document.createElement("h4"); //price
price.textContent = product.price; 

const attribute = document.createElement("h4"); //attribute depending of type 
attribute.textContent =product.attribute;

           

container.appendChild(card);
card.appendChild(checkbox);
card.appendChild(sku);
card.appendChild(name);
card.appendChild(price);
card.appendChild(attribute);
