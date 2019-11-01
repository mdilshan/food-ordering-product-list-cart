
const __REF__ = document.querySelector('.product-modal');
let burgers = [];
burgers =  JSON.parse(localStorage.getItem('fakeData'))
/**
 * Generate a modal for display product summary
 * @param {number} id - the id of the html element, i.e id of the product
 * @returns {Void}
 */

function getDetailOfProduct(id){
    id = String(id);
    ajax('GET',`http://localhost/iwt/client/API/product_details.php?id="${id}"`)
        .then(data => {
                const obj = {
                    layers : data,
                    recipe_id : id,
                    name : 'Summary',
                    description : ''
                }
                return renderModal(obj, __REF__)
            }
        )
        .catch(err => console.log('err',err));
}

