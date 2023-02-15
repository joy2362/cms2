<template>
    <ul id="chat">
        <li class="you">
            <div class="entete">
                <span class="status green"></span>
                <h2>Vincent</h2>
                <h3>10:12AM, Today</h3>
            </div>
            <div class="triangle"></div>
            <div class="message">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
            </div>
        </li>
        <li class="me">
            <div class="entete">
                <h3>10:12AM, Today</h3>
                <h2>Vincent</h2>
                <span class="status blue"></span>
            </div>
            <div class="triangle"></div>
            <div class="message">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
            </div>
        </li>
        <li class="me">
            <div class="entete">
                <h3>10:12AM, Today</h3>
                <h2>Vincent</h2>
                <span class="status blue"></span>
            </div>
            <div class="triangle"></div>
            <div class="message">
                OK
            </div>
        </li>
        <li class="you">
            <div class="entete">
                <span class="status green"></span>
                <h2>Vincent</h2>
                <h3>10:12AM, Today</h3>
            </div>
            <div class="triangle"></div>
            <div class="message">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
            </div>
        </li>
        <li class="me">
            <div class="entete">
                <h3>10:12AM, Today</h3>
                <h2>Vincent</h2>
                <span class="status blue"></span>
            </div>
            <div class="triangle"></div>
            <div class="message">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
            </div>
        </li>
        <li class="me">
            <div class="entete">
                <h3>10:12AM, Today</h3>
                <h2>Vincent</h2>
                <span class="status blue"></span>
            </div>
            <div class="triangle"></div>
            <div class="message">
                OK
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    data: () => ({
        isActive: false,
    }),
}
</script>

<style scoped>
.blue{
    background-color:#6fbced;
    margin-right:0;
    margin-left:7px;
}


#chat{
    padding-left:0;
    margin:0;
    list-style-type:none;
    overflow-y:scroll;
    height:535px;
    border-top:2px solid #fff;
    border-bottom:2px solid #fff;
}
#chat li{
    padding:10px 30px;
}
#chat h2,#chat h3{
    display:inline-block;
    font-size:13px;
    font-weight:normal;
}

#chat .entete{
    margin-bottom:5px;
}
#chat .message{
    padding:20px;
    color:#fff;
    line-height:25px;
    max-width:90%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
}
#chat .me{
    text-align:right;
}
#chat .you .message{
    background-color:#58b666;
}
#chat .me .message{
    background-color:#6fbced;
}
#chat .triangle{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 10px 10px 10px;
}
#chat .you .triangle{
    border-color: transparent transparent #58b666 transparent;
    margin-left:15px;
}
#chat .me .triangle{
    border-color: transparent transparent #6fbced transparent;
    margin-left: 375px;
}


</style>
