$(document).ready(() => {
    $('* #plusIMG').click((e) => {
        //number of items
        let children = Array.prototype.slice.call(e.target.parentElement.children);
        let tickets = children.filter((element) => element.id.includes("ticket") && element.tagName == 'P'); 
        console.log(tickets);
        let numberOfTickets = tickets[0].textContent;
        numberOfTickets++;
        let showId = tickets[0].id.split('ticket')[0];
        let representationId = tickets[0].id.split('ticket')[1];
        //Element p
        $(`#${tickets[0].id}`).load("LOGIC/modifyTicketNumber.logic.php",{
            ticketsNewCount: numberOfTickets,
            showId : showId,
            representationId: representationId
        });
        //price
        let pPrice = children.filter((element) => element.id.includes("price") && element.tagName == 'P')
        let price = pPrice[0].textContent;
        price = price.substring(0,price.length-1);
        price = parseFloat(price);
        price += price/(numberOfTickets-1);
        $(`#${pPrice[0].id}`).load("LOGIC/updatePrice.logic.php",{
            newPrice: price,
            showId : showId,
            representationId: representationId
        })
    })
    $('* #minusIMG').click((e) => {
        //number of items
        let children = Array.prototype.slice.call(e.target.parentElement.children);
        let tickets = children.filter((element) => element.id.includes("ticket") && element.tagName == 'P'); 
        let numberOfTickets = tickets[0].textContent;
        if(numberOfTickets > 1){
            numberOfTickets--;
            let showId = tickets[0].id.split('ticket')[0];
            let representationId = tickets[0].id.split('ticket')[1];
            //Element p
            $(`#${tickets[0].id}`).load("LOGIC/modifyTicketNumber.logic.php",{
                ticketsNewCount: numberOfTickets,
                showId : showId,
                representationId: representationId
            });
            //price
            let pPrice = children.filter((element) => element.id.includes("price") && element.tagName == 'P')
            let price = pPrice[0].textContent;
            price = price.substring(0,price.length-1);
            price = parseFloat(price);
            price -= price/(numberOfTickets+1);
            $(`#${pPrice[0].id}`).load("LOGIC/updatePrice.logic.php",{
                newPrice: price,
                showId : showId,
                representationId: representationId
            })
        }
    })
    $('* #xIMG').click((e) => {
        let parent = e.target.parentElement;
        console.log(parent);
        let showId = parent.id.split('ticketItem')[0];
        let representationId = parent.id.split('ticketItem')[1];
        $("#container").load("LOGIC/removeCartItem.logic.php",{
            showId : showId,
            representationId: representationId
        })
    })
})