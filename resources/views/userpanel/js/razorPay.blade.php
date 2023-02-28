
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

class razorPay extends paymentInterface{
    constructor(userDetails,totalAmount){
        this.userDetails = userDetails;
        this.totalAmount = totalAmount;
        this.paymentDetails = {
            payment_id:null,
            order_id:null
        }
        this.successDetails = {}
       
        this.options = {
            "key": "tWkIxUcqup9ohJc7GnweJxHo", // Enter the Key ID generated from the Dashboard
            "amount": parseInt(totalAmount) * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Kedar Collections",
            "description": "Handcraft Collections",
            "image": "https://example.com/your_logo",
            "order_id": this.order_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function (response){
                razorPay.prototype.paymentDetails = {
                    payment_id : response.razorpay_payment_id,
                    order_id : response.razorpay_order_id                    
                }
                razorPay.prototype.successDetails = response;
                console.log(response.razorpay_payment_id);
                console.log(response.razorpay_order_id);
                console.log(response.razorpay_signature)
            },
            "prefill": userDetails,
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        
    }
    initiatePayment(){
        console.log("Payment initiated... for RAZORPAY")
        this.client = new Razorpay(this.options);
        this.client.on('payment.failed', function (response){
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata.order_id);
            alert(response.error.metadata.payment_id);
        });
    }
    savePaymentDetails(status){
       let data;
       data = {
        user_contact : this.userDetails.contact,
        user_name : this.userDetails.name,
        user_email : this.userDetails.email,
        user_address:this.userDetails.address,
        payment_id: this.paymentDetails.payment_id,
        order_id: this.paymentDetails.order_id,
        status: status,
        details_json:JSON.stringify(this.successDetails),
        type:"razor_pay"
       }
       $.post("/api/",data,(resposne,status,xhr) => {

       })
    }
    
 


}


</script>