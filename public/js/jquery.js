// function for type selection and other select option hiding
function productType(that) {
    if (that.value == "dvd") {
        document.getElementById("ifDvd").style.display = "block";
        $("#dvd").val("");
    } else {
        document.getElementById("ifDvd").style.display = "none";
    }
    if (that.value == "book") {
        document.getElementById("ifBook").style.display = "block";
        $("#book").val("");
    } else {
        document.getElementById("ifBook").style.display = "none";
    }
    if (that.value == "furniture") {
        document.getElementById("ifFurniture").style.display = "block";
        $("#height, #width, #length").val("");
    } else {
        document.getElementById("ifFurniture").style.display = "none";
    }

}


// function that marks all Products checkboxes as 'checked' for delete action

function allProducts(that){
    $("#checkProduct").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
        });
}

// AJAX for delete products
// URL is not working - cant call on 'controllers/Products/delete method
/*
$(document).submit(function(event){
    event.preventDefault();

    $(function () {
        $('form').each(function () {
            var id = $('input[name="check[]"]:checked').map(function(){ 
                return this.value; 
            }).get();
                 
                 console.log(id);
                 $.ajax({
                    type: 'post',
                    url: '#',
                    data: id,
                    success: function(msg){
                        alert(id)
                
                    }
                })
             })
        })
    })
*/
