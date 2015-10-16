--@01   16/10/15 yomaco     agregando amarre para optener valores de los indicadores, agregando la tabla datoindicador 
SELECT 
	A .idformindicador,	b.idrepterritorial,	b.nombre as localidad,	b.codigo,	C .nombre as nombreindicador,fi.sigla as abrSector,	e.idfuenteinformacion,	fi.nombre,di.valor,G .sigla,	date_part('year', e.fechadatoini) :: CHARACTER VARYING AS periodo
FROM
	formindicador A,	repterritorial b,	formula C,	formvarterri e,	indicador f,	unidadmedida G,	fuenteinformacion fi, datoindicador di
WHERE
	A .idrepterritorial = b.idrepterritorial
	AND A .idformula = C .idformula
	AND A .idformindicador = e.idformindicador
	AND C .idformula = f.idformula
	AND f.idunidadmedida = G .idunidadmedida
	AND b.idrepterritorial = A .idrepterritorial
	AND fi.idfuenteinformacion = e.idfuenteinformacion
        --@01   Inicio
	AND di.fechadatoini = e.fechadatoini
	AND di.idrepterritorial = b.idrepterritorial
	AND di.idfuenteinformacion = fi.idfuenteinformacion
	AND di.idvariables = e.idvariables
        --@01   Fin
	AND fi.idfuenteinformacion IN (62)
	AND b.idrepterritorial = 281
	AND e.fechadatoini BETWEEN '2002-01-01' AND '2012-01-01'
	GROUP BY 	di.valor,fi.nombre,	A .idformindicador,	b.idrepterritorial,	b.nombre,	b.codigo,	C .nombre,fi.sigla,	e.idfuenteinformacion,	C .formula,
	A .idrepterritorial,	e.idfuenteinformacion,	e.idmetodocaptura,	G .sigla,	e.fechadatoini
	ORDER BY A.idformindicador;
