
/**
 * create a modal
 * @param {Object} props - data to render in modal
 * @param {Object} __REF__ - model reference to the html element
 * @returns {Void} 
 */
function renderModal(props, __REF__){
    __REF__.style.display = "block";

    let priceOfOne = 0;
    let orderQty = 1;
    props.orderQty = orderQty;
    props.layers.map(item => priceOfOne += Number(item.price_of_one));
    /**
     * Total price of the selected item
     * @type {Number} 
     */
    
    let total = priceOfOne * orderQty;
    const template = `
        <div class="product-modal__content">
            <div class="product-modal__content__header">
                <div class="product-modal__content__header__item-1">${props.name}</div>
                <div class="product-modal__content__header__item-2"><span class='close'>&times;</span></div>
            </div>
            <div class="product-modal__content__body">
                <div class="item-detail description">${props.description}</div>
                <div class="item-detail">
                    <div class="col col--1 col-title">Name</div>
                    <div class="col col--2 col-title">Qty</div>
                    <div class="col col--3 col-title">Price</div> 
                </div>    
                ${props.layers.map(item => `
                    <div class="item-detail">
                        <div class="col col--1">${item.layer_name}</div>
                        <div class="col col--2">1</div>
                        <div class="col col--3">${item.price_of_one}</div>
                    </div> 
                `).join('')}
                    <div class="item-detail">
                        <div class="col col--1 col-price">TOTAL</div>
                        <div class="col col--2 col-price"><input id="orderQty" type='text' value=${orderQty}></div>
                        <div class="col col--3 col-price" id="order-price">${total}</div> 
                    </div>  
                </div>
                <div class="product-modal__content__footer">
                    <button class='btn btn-primary' id='on-submit'>Add to cart</button>
                </div>
            </div>
        </div>
    `
    __REF__.innerHTML = template;

    //Validate input field and update DOM elements
    if(document.querySelector('#orderQty')){
        const inp = document.querySelector("#orderQty");
        inp.addEventListener('input', () => {
            if(!Number(inp.value) && !inp.value == ''){
                alert('Please enter only numbers')
            }else{
                orderQty = inp.value;
                props.orderQty = Number(orderQty);
                total = orderQty * priceOfOne;
                const price = document.querySelector('#order-price');
                price.innerHTML = total;
            }
        })
    }
    
    //Validate and submit the 
    if(document.querySelector('#on-submit')){
        const btn = document.querySelector("#on-submit");
        btn.addEventListener('click', () => {
            __REF__.innerHTML = `<div class="lds-facebook"><div></div><div></div><div></div></div>`;
            console.log(props);
            if(total){
                ajax('POST', 'http://localhost/iwt/client/API/addToCart.php', props)
                .then(res => {
                    __REF__.style.display = 'none';
                    __REF__.innerHTML = null;
                    return alert(res.message);
                })
                .catch(err => alert(err))
            }else{
                alert('please select burger qty')
            }
        })
    }

    //close the modal
    if(document.querySelector('.close')){
        const btn = document.querySelector('.close')
        btn.addEventListener('click', () => {
            priceOfOne = 0;
            __REF__.style.display = "none";
        })
    }
}
