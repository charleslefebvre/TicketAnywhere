$(document).ready(() => {   
    $("* select").change((e) => {
        let selected;
        for(let element of e.target.children){
            if(element.selected){
                selected = element
            }
        }
        let newPrice = selected.id;
        let children = Array.prototype.slice.call(e.target.parentElement.parentElement.children);
        parent = children[0];
        let price = children[0].children[4];
        $(`#${price.id}`).load("LOGIC/updatePriceRepresentation.logic.php",{
            newPrice: newPrice
        });
        $(`#${price.id}`).bind('DOMSubtreeModified',(e) => {
            let hiddenId = price.id.split('price')[1];
            hiddenId = 'hidden' + hiddenId;
            $(`#${hiddenId}`)[0].value = newPrice;
        });
    });
})