<style>
    .container {
        display: grid;
        grid-template-columns: repeat(10, 1fr);
        grid-template-rows: repeat(10, 1fr);
    }

    .child1, .child2 {
        height:100px;
    }

    .child1 {
        background:red;
        z-index:1;
    }

    .child2 {
        background:yellow;
        z-index:2;
    }
</style>

<div class="container"">
    <div class="child1"></div>
    <div class="child2"></div>
</div>
