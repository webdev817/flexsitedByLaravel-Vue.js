


@if ($wizeredObj->nameofCompanyForLog != null || $wizeredObj->taglineSlogan != null ||
  $wizeredObj->logoColorPrefernce != null || $wizeredObj->textandImageOrText != null ||
  $wizeredObj->logoFontPrefernce != null  )

  @include('admin.users.clientOnBoarding.logoFlyerBusiness.logoDesign')

@endif


@if ($wizeredObj->flayerColorPrefernce != null )
  @include('admin.users.clientOnBoarding.logoFlyerBusiness.flyer')
@endif



@if ($wizeredObj->frontandbackdesign != null || $wizeredObj->businesssCardColorPrefernce != null)
  @include('admin.users.clientOnBoarding.logoFlyerBusiness.business')
@endif
