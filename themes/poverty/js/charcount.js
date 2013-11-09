  function textrem( field, rem, maxlimit ) {
    if ( field.value.length > maxlimit )
    {
      field.value = field.value.substring( 0, maxlimit );
      return false;
    }
    else
    {
      rem.value = maxlimit - field.value.length;
    }
  }