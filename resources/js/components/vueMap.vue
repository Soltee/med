<template>
    <div class="relative">
        <transition 
            name="slide-fade" 
            enter-active-class="transition duration-150 opacity-100"
            leave-active-class="transition duration-150 opacity-0"
        >
            <div v-if="success" class="fixed right-0 top-0 mt-8 z-10 mr-3  text-white w-64 bg-green-600 border-2 border-green-600 rounded px-4 py-3">
                <span class="">Successful.</span>
                <div class="absolute right-0 top-0">
                </div>
            </div>
        </transition>
        <div id="mapid" class="z-0">
         
        </div>
        <transition 
            name="fade" 
            enter-active-class="transition duration-150 opacity-100"
            leave-active-class="transition duration-150 opacity-0"
        >
            <div v-if="markerAdded" class="absolute left-0 top-0 bg-gray-300 w-64 rounded-r-lg z-10 p-3  ">
                <form @submit.prevent="addLocation">

                    <div class="flex flex-wrap mb-6">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">
                            Address
                        </label>

                        <input id="address" type="address" class="form-input w-full " v-model="address" required autocomplete="address" autofocus>

                    </div>

                    <div class="flex flex-wrap mb-6">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-gray-100 font-bold form-input w-full rounded focus:outline-none focus:shadow-outline" v-text="(loading) ? 'Processing ....' : 'Save Location'">
                            Save Location
                        </button>

                    </div>

                </form>
            </div>
        </transition>

    </div>
</template>

<script>
    export default {
        name  : 'geomap',
        data(){
            return {
                myMap    : null,
                marker   : {
                    prev    : null,
                    current : null
                },
                location : {
                    lang : 28.2026,
                    long : 83.985
                },
                userLocation : {
                    lat : 0,
                    lng : 0
                },
                address   : '',
                markerAdded : false,
                loading     : false,
                success     : false,
            }
        },
        mounted() {

            
            this.myMap = L.map('mapid').setView([this.location.lang, this.location.long], 13);
            const attribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors , <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>';
            const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
            const tiles = L.tileLayer(tileUrl, { attribution });
            tiles.addTo(this.myMap);
            // cL.marker([this.location.lang, this.location.long]).addTo(this.myMap);
            this.myMap.on('click', (e)=>{this.addMarker(e)});
        },

        watch: {
            myMap : function()
            {

            }
        },
        updated(){
        },
        methods: {
            addMarker(e)
            {
                if(this.marker.current){
                    this.marker.prev     = this.marker.current;
                    this.myMap.removeLayer(this.marker.prev);                    
                }

                this.userLocation.lat = e.latlng.lat;
                this.userLocation.lng = e.latlng.lng;

                this.marker.current = new L.Marker(this.userLocation, {draggable:true});
                this.myMap.addLayer(this.marker.current);
                this.markerAdded = true;
                var popup = L.popup()
                    .setLatLng([e.latlng.lat, e.latlng.lng])
                    .setContent("<span class='relative'>Help! I am here.</span>")
                    .openOn(this.myMap);

                // this.marker = L.marker([this.userLocation.lang, this.userLocation.long]).addTo(this.myMap);

                

            },
            addLocation(){

                this.loading = true;


                let formData = new FormData();

                formData.append('address', this.address);
                formData.append('latitude', this.userLocation.lat);
                formData.append('longitude', this.userLocation.lng);
                console.log(this.userLocation);

                axios.post('/location', formData).then(res => {
                    if(res.status == 201)
                    {
                        this.markerAdded = false;
                        this.loading = false;
                        this.success = true;

                        setTimeout(() => {
                            this.success = false;
                        }, 3000);
                    }
                }).catch(err => {

                });
                
                
            }
        }
    };
</script>
<style scoped>
    #mapid { height: 500px; width: 100%;}
</style>