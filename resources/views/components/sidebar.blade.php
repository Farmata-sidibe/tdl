<div
    class="w-[20vw] mb-[10px] px-[10px] py-[20px] bg-white shadow-sm light:bg-gray-800 overflow-hidden  sm:rounded-lg">
    <h3 class="text-[25px] font-semibold flex flex-row items-center gap-[10px]">
        @svg('params', ['width' => '1.3em', 'height' => '1.3em', 'fill' => '#000'])
        Paramêtre</h3>
    <div class="flex flex-col gap-[10px]">

        <a href="{{route('profile.edit')}}" class="btns active cursor-pointer" id="profile">Mon profil</a>
        <a href="{{$routeListeEdit}}" class="btns cursor-pointer" id="description">Ma liste</a>
        <a href="#" class="btns cursor-pointer" id="cagnotte">Ma cagnotte</a>
        <a href="#" class="btns cursor-pointer" id="bancaire">Information bancaire</a>
        <a href="#" class="btns cursor-pointer" id="historique">Historique</a>
    </div>
</div>
