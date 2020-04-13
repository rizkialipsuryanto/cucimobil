
Vue.directive('sortable', {
    twoWay: true,
    deep: true,
    bind: function () {
        var that = this;

        var options = {
            draggable: Object.keys(this.modifiers)[0]
        };

        this.sortable = Sortable.create(this.el, options);
        console.log('sortable bound!')

        this.sortable.option("onUpdate", function (e) {            
            that.value.splice(e.newIndex, 0, that.value.splice(e.oldIndex, 1)[0]);
        });

        this.onUpdate = function(value) {            
            that.value = value;
        }
    },
    update: function (value) {        
        this.onUpdate(value);
    }
});

Vue.directive('kec', { 
    bind:function(){
        Vue.nextTick(() =>{
            this.el.text();
        }); 
    }
});

var vm = new Vue({
    el: '#app',
    data: {
        rows: [],
        tbl: {},
        jenis: '',
        ukuran: '',
        muka: '',
        tema: '',
        alamat: '',
        rt: '',
        rw: '',
        kelurahan: '',
        kecamatan: '',
        jumlah: 0
    }, 
    methods: {
        addRow: function (index) {
            try {
                this.rows.splice(index + 1, 0, {});
            } catch(e)
            {
                console.log(e);
            }
        },
        removeRow: function (index) {
            this.rows.splice(index, 1);
        },
        tambahalamat: function(tbl) {
            this.rows.push({  
            'jenis': tbl.jen, 
            'ukuran': tbl.uku, 
            'muka': tbl.muk, 
            'tema': tbl.tem, 
            'alamat': tbl.ala, 
            'rt': tbl.rti, 
            'rw': tbl.rwi, 
            'kelurahan': $('#kel option:selected').text(),  
            'kecamatan': $('#kec option:selected').text(), 
            'jumlah': tbl.jum
            });
            this.tbl.jen = '';
            this.tbl.uku = ''; 
            this.tbl.muk = '';
            this.tbl.tem = '';
            this.tbl.ala = '';
            this.tbl.rti = '';
            this.tbl.rwi = '';
            this.tbl.jum = '';
        } 
    }
});
