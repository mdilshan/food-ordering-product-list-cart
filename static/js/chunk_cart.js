/**
 * 
 * @param {id} id recipe_id of the cart item
 */
const removeItem = (id) => {
    const obj = {recipe_id : id}
    ajax('POST', `http://localhost/iwt/client/API/removeCartItem.php`, obj)
        .then(res=>{
            location.reload();
        })
        .catch(err=>{
            alert(err);
        })
}