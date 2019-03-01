    function doMove() {
        var frm = document.getElementById("ctrl");
        if (frm.which1[0].selected) {
            var obj = document.getElementById("inner");
        } else {
            var obj = document.getElementById("outer");
        }
        obj.style['left'] = frm.newx.value + 'px';
        obj.style['top'] = frm.newy.value + 'px';
    }

    function resetMove() {
        var obj = document.getElementById("inner");
        obj.style['left'] = '100px';
        obj.style['top'] = '10px';
        var obj = document.getElementById("outer");
        obj.style['left'] = '100px';
        obj.style['top'] = '10px';
    }

    function doPos() {
        var frm = document.getElementById("ctrl");
        if (frm.which2[0].selected) {
            var obj = document.getElementById("inner");
        } else {
            var obj = document.getElementById("outer");
        }
        if (frm.postype[0].selected) {
            obj.style['position'] = 'relative';
        } else if (frm.postype[1].selected) {
            obj.style['position'] = 'absolute';
        } else {
            obj.style['position'] = 'fixed';
        }
    }

    function resetPos() {
        var obj = document.getElementById("inner");
        obj.style['position'] = 'absolute';
        var obj = document.getElementById("outer");
        obj.style['position'] = 'absolute';
    }