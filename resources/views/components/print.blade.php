<style>
    .print_header {
        border-bottom: 1px solid #ccc;
        align-items: flex-start;
        display: flex;
        padding: 20px 0 10px;
    }
    .print_header .header_logo {min-width: 120px;}
    .print_header_info {width: 100%;}
    .print_header_info h3 {
        font-weight: 600;
        font-size: 30px;
    }
    .print_header_info p strong {
        display: inline-block;
        min-width: 70px;
        font-weight: 600;
    }
    .print_header_info p {
        font-size: 16px;
        margin: 3px 0;
        color: #000;
    }
    .print_header img {
        max-width: 220px;
        width: auto;
    }
</style>

<div class="print_header print_flex_only">
    <div class="header_logo">
        <img src="{{asset('public/backend/images/logo/freelanceitlabOld.png')}}" alt="Image Not Found">
    </div>
    <div class="print_header_info">
        <h3>Name of Company</h3>
        <p><strong>Mobile</strong> : 01910217482</p>
        <p><strong>Address</strong> : Haluaghat, Mymensingh</p>
    </div>
</div>