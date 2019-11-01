
let customBurger =     {
    name : 'Custom Burger',
    layers : [],
    description : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    price : 00
}

const __REF_TO_BURGER = document.querySelector('.dynamic-items');
const __REF_TO_BURGER_PRICE__ = document.querySelector('.price-box');
const __REF_TO_MODAL__ = document.querySelector('.product-modal');

/**
 * Find the particular ingredient from layers list and update the customBurger object 
 * @param {String} name - name of the ingredient
 * @param {String} id - id of the selected button
 * @returns {Void}
 */
function addIngredients(name, id){
    const foundItem = __DATA__.filter(ingredient => ingredient.layer_name === name);
    customBurger.layers.push(foundItem[0]);
    customBurger.price += Number(foundItem[0].price_of_one);
    document.getElementById(id+'I').disabled = true;
    document.getElementById(id+'D').disabled = false;

    __REF_TO_BURGER_PRICE__.innerHTML = customBurger.price;

    __REF_TO_BURGER.innerHTML += `<div class="layer" id='dynamic${id}'><img src="http://localhost/iwt/client/static${foundItem[0].image}" alt="" class="img img--${id}"></div>`
}


/**
 * Update the customBurger after remove items
 * @param {String} name - name of the ingredient 
 * @param {String} id - id of the selected button
 */
function removeIngredients(name, id){
    const updatedIngredients =  customBurger.layers.filter(ingredient => ingredient.layer_name !== name);
    console.log(updatedIngredients);
    customBurger.price = 0;
    customBurger.layers = updatedIngredients;
    updatedIngredients.map(ingredient => customBurger.price += Number(ingredient.price_of_one))

    document.getElementById(id+'D').disabled = true;
    document.getElementById(id+'I').disabled = false; 

    __REF_TO_BURGER_PRICE__.innerHTML = customBurger.price;

    const layer = document.getElementById(`dynamic${id}`);
    layer.parentElement.removeChild(layer);

}


function getDetailOfCustomProduct(){
    const props = customBurger;
    props.name = 'Custom Burger';
    renderModal(props, __REF_TO_MODAL__ );
}