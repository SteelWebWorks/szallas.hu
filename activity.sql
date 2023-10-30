SELECT CONCAT(
  'SELECT `companies`.companyId', GROUP_CONCAT('
     ,    `t_', REPLACE(activity, '`', '``'), '`.companyName
         AS `', REPLACE(activity, '`', '``'), '`'
     SEPARATOR ''),
 ' FROM `companies` ', GROUP_CONCAT('
     LEFT JOIN `companies`   AS `t_', REPLACE(activity, '`', '``'), '`
            ON `companies`.companyId = `t_', REPLACE(activity, '`', '``'), '`.companyId
           AND `t_', REPLACE(activity, '`', '``'), '`.activity = ', QUOTE(activity)
     SEPARATOR ''),
 ' GROUP BY `companies`.companyId'
) INTO @qry FROM (SELECT DISTINCT activity FROM `companies`) t;

PREPARE stmt FROM @qry;
EXECUTE stmt;