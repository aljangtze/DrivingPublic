// JavaScript Document
//地图25.0484120000,102.7066440000
$(function () {
        ShowMap('102.7066440000,25.048412000', ' 云南金策文化传播有限公司', '', '', '', '30');
    })
    function getInfo(id) {
        $.ajax({
            type: "POST",
            url: "",
            cache: false,
            async: false,
            data: { ID: id },
            success: function (data) {
                data = eval(data);
                var length = data.length;
                if (length > 0) {
                    ShowMap(data[0]["Image"], data[0]["NewsTitle"], data[0]["Address"], data[0]["Phone"], data[0]["NewsTags"], data[0]["NewsNum"]);
                }
            }
        });
    }
    function ShowMap(zuobiao, name, addrsee, phone, users, zoom) {
        var arrzuobiao = zuobiao.split(',');
        var map = new BMap.Map("allmap");
        map.centerAndZoom(new BMap.Point(arrzuobiao[0], arrzuobiao[1]), zoom);
        map.addControl(new BMap.NavigationControl());
        var marker = new BMap.Marker(new BMap.Point(arrzuobiao[0], arrzuobiao[1]));
        map.addOverlay(marker);
        var infoWindow = new BMap.InfoWindow('<p style="color: #bf0008;font-size:14px;">' + name + '</p>');
        marker.addEventListener("click", function () {
            this.openInfoWindow(infoWindow);
        });
        marker.openInfoWindow(infoWindow);
    }