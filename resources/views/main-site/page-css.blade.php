<style>

    .card{
        background-color: transparent;
        border: none;
    }

    .card-header{

        background-color: transparent;
        border-bottom: none;
        position: relative;

    }

    .card-header::after{
        content: '';
        position: absolute;
        display: block;
        width: 200px;
        height: 3px;
        background: rgb(233,195,26);
        bottom: 0;
        left: calc(50% - 100px);
    }

    .card-body p, .card-body li,.card-footer p{
        line-height: 2;  
        color: #000;
    }

    .card-header h2{
        color: #fff;
        font-size: 3rem;
    }

    .about{
        padding: 20px;
        background-color: rgb(231, 199, 64);
    }
</style>