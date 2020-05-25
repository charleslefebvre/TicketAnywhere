$(document).ready(() => {
    $('* #plusIMG').click((e) => {
        let children = Array.prototype.slice.call(e.target.parentElement.children);
        let tickets = children.filter((element) => element.id != '' && element.tagName == 'P'); //to h
        let numberOfTickets = tickets[0].textContent;
        numberOfTickets++;
        //Element p
        $(`#${tickets[0].id}`).load("LOGIC/modifyTicketNumber.logic.php",{
            ticketsNewCount: numberOfTickets
        });
    })
    $('* #minusIMG').click((e) => {
        let children = Array.prototype.slice.call(e.target.parentElement.children);
        let tickets = children.filter((element) => element.id != '' && element.tagName == 'P'); //to h
        let numberOfTickets = tickets[0].textContent;
        if(numberOfTickets != 0){
            numberOfTickets--;
            //Element p
            $(`#${tickets[0].id}`).load("LOGIC/modifyTicketNumber.logic.php",{
                ticketsNewCount: numberOfTickets
            });
        }

    })
})