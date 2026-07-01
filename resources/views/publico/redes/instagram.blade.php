@extends('layouts.publica')

@section('titulo', 'Instagram - CONAPDIS')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <div style="width: 55px; height: 55px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </div>
                    <div>
                        <h1 class="pagina-titulo mb-0" style="border: none; padding: 0;">Instagram</h1>
                        <p class="pagina-subtitulo mb-0">Cuentas oficiales de CONAPDIS en Instagram</p>
                    </div>
                </div>

                {{-- Nacional centrado --}}
                <div class="row justify-content-center mb-4">
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://www.instagram.com/conapdisvzla/" target="_blank" class="text-decoration-none">
                            <div style="width: 90px; height: 90px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.85rem; color: #1f2937; font-weight: 600;">CONAPDIS Nacional</span>
                        </a>
                    </div>
                </div>

                <hr style="margin: 1.5rem 0;">

                {{-- Estados --}}
                <div class="row g-4">
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Amazonas" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Amazonas</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Anzoategui" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Anzoátegui</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Apure" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Apure</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Aragua" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Aragua</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Barinas" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Barinas</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Bolivar" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Bolívar</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Carabobo" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Carabobo</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Cojedes" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Cojedes</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_DeltaAmacuro" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Delta Amacuro</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_DC" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Distrito Capital</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Falcon" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Falcón</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Guarico" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Guárico</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_LaGuaira" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">La Guaira</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Lara" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Lara</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Merida" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Mérida</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Miranda" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Miranda</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Monagas" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Monagas</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_NuevaEsparta" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Nueva Esparta</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Portuguesa" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Portuguesa</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Sucre" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Sucre</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Tachira" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Táchira</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Trujillo" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Trujillo</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Yaracuy" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Yaracuy</span>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="https://instagram.com/CONAPDIS_Zulia" target="_blank" class="text-decoration-none">
                            <div style="width: 80px; height: 80px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem;">
                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </div>
                            <span style="font-size: 0.78rem; color: #4b5563; font-weight: 500;">Zulia</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection