window.onload = function(){
    document.getElementById("download")
    .addEventListener("click",()=> {
        const invoice = this.document.getElementById("invoice");
        console.log(invoice);
        console.log(window);
        // var opt = {
        //     margin: 1,
        //     filename: 'myfile.pdf',
        //     image: { type: 'jpeg', quality: 0.98 },
        //     html2canvas: { scale: 10 },
        //     jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        // };
        html2pdf().from(invoice).save();
    })
}