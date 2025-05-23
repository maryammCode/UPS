@extends('intranet.layouts.app') 
@section('content')

<!-- Container for button on the left and i icon on the right -->
<div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">

    <!-- Button on the left -->
    <a href="{{ route('intranet.magasin') }}" 
       class="btn btn-primary" 
       style="text-decoration: none; padding: 8px 16px; background-color: #007bff; color: white; border-radius: 4px;">
       Voir les statistiques du magasin
    </a>

    <!-- "i" icon on the right with tooltip -->
    <div style="position: relative;">
        <span style="font-weight: bold; font-size: 14px;">Rafraîchissement </span>
        <div style="position: relative; display: inline-block;">
            <span style="border: 1px solid #ccc; border-radius: 50%; padding: 2px 6px; font-size: 14px; cursor: pointer; background: #f0f0f0;">i</span>
            <div style="
                visibility: hidden;
                width: 240px;
                background-color: black;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 10px;
                position: absolute;
                z-index: 1;
                top: 130%;
                left: 50%;
                transform: translateX(-50%);
                opacity: 0;
                transition: opacity 0.3s;
            ">
                Le rafraîchissement des données du tableau de bord a lieu à 8h00, 10h00, 12h00, 14h00, 16h00 et 18h00.
                <a href="https://app.powerbi.com/groups/me/list?experience=power-bi&clientSideAuth=0" style="color: #58a6ff; text-decoration: underline;">rafraîchissement manuelle dans Power BI service</a> 
            </div>
        </div>
    </div>
</div>

<!-- Spacer -->
<div style="padding-top: 20px;"></div>

<!-- Power BI Dashboard -->
<div style="position: relative;">
    <iframe 
      title="PartieBIAdmin" 
      width="800" 
      height="500.5" 
      src="https://app.powerbi.com/view?r=eyJrIjoiYWFiZmE1YTktOTM3Ny00OThiLWJiZTctYzg1YTg0NjU1NDYzIiwidCI6ImRiZDY2NjRkLTRlYjktNDZlYi05OWQ4LTVjNDNiYTE1M2M2MSIsImMiOjl9" 
      frameborder="0" 
      allowFullScreen="true">
    </iframe>
</div>

<!-- Tooltip Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.querySelector('div[style*="display: inline-block"]');
    const tooltip = container.querySelector('div[style*="visibility: hidden"]');
    container.addEventListener('mouseenter', () => {
        tooltip.style.visibility = 'visible';
        tooltip.style.opacity = '1';
    });
    container.addEventListener('mouseleave', () => {
        tooltip.style.visibility = 'hidden';
        tooltip.style.opacity = '0';
    });
});
</script>

@endsection
