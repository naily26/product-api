@extends('master')

@section('content')
<h2>Daftar Produk</h2>
<!-- table for showing data -->
<hr />
<div>
    <button class="btn btn-outline-dark btn-sm" onclick="getapi(api_url, 'table')">Show Product</button>
    <br />
    <br />
    <table id="product_table" class="table table-striped"></table>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title_id"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modal_img" src="" alt="" style="height:150px;">
                <br/><br/>
                <p id="modal_desc"></p>
                <p id="stock"></p>
                <p id="brand"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    // api url
    const api_url =
        "https://dummyjson.com/products";

    function detail(params) {
        const detail_url = api_url + '/' + params;
        getapi(detail_url, 'modal');
    }
    // Defining async function
    async function getapi(url, type) {

        // Storing response
        const response = await fetch(url);

        // Storing data in form of JSON
        var data = await response.json();
        console.log(data);
        if (type == 'table') {
            show(data);
        } else if (type == 'modal') {
            show_modal(data);
        }

    }

    function show(data) {
        let tab =
            `<tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Action</th>
            </tr>`;

        // Loop to access all rows
        for (let r of data.products) {
            tab += `<tr>
                <td><img src="${r.thumbnail}" class="img-thumbnail" alt="" style="width:100px;height:100px;"></td>
                <td>${r.title}</td>
                <td>${r.price}</td>
                <td>${r.discountPercentage}</td>
                <td><button onclick="detail(${r.id})" >detail</button></td>
            </tr>`;
        }
        document.getElementById("product_table").innerHTML = tab;
    }

    function show_modal(data_modal) {
        var data = data_modal;
        $('#title_id').text(data.title+" - $"+data.price+" ("+data.discountPercentage+"%)");
        $('#modal_desc').text(data.description);
        $('#brand').text("brand : "+data.brand);
        $('#stock').text("stock : "+data.stock);
        $("#modal_img").attr("src",data.thumbnail);
        $('#productModal').modal('show');
        console.log(data.id);
    }

</script>



@endsection
