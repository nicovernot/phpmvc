<?
class participant{
function verifyFields($params)
{
	$error = '';

	if (!is_string($params['firstname']))
	{
		$error .= 'Field >firstname< is not a string';
	}
	if (!is_string($params['lastname']))
	{
		$error .= 'Field >lastname< is not a string';
	}
	if (!is_string($params['mail']))
	{
		$error .= 'Field >mail< is not a string';
	}
	return $error;
}

function add($params)
{
	global $db;

	if (($errors = $this->verifyFields($params)) != '')
	{
		return $errors;
	}

	$data = array(
		'firstname' => $params['firstname'],
		'lastname' => $params['lastname'],
		'mail' => $params['mail']
	);

	//Returns either the new ID of the row inserted or FALSE on failure 
	return $db->query_insert('participant', $data);
}

function edit($id, $params)
{
	global $db;

	if (($errors = $this->verifyFields($params)) != '')
	{
		return $errors;
	}

	$data = array(
		'firstname' => $params['firstname'],
		'lastname' => $params['lastname'],
		'mail' => $params['mail']
	);

	return $db->query_update('participant', $data, ' id = ' . $id);
}

function delete($id)
{
	global $db;

	return $db->query(sprintf('DELETE FROM `participant` WHERE id = %d', $id));
}

function getAll($startIndex = null, $numRows = null, $orderBy = null, $orderDirection = 'asc')
{
	global $db;

	if (($startIndex != null) && (!is_numeric($startIndex) || ($startIndex < 0)))
	{
		return false;
	}

	if (($numRows != null) && (!is_numeric($numRows) || ($numRows < 0)))
	{
		return false;
	}

	$order = '';
	$limit = '';
	$fieldsArray = array('id', 'firstname', 'lastname', 'mail');

	if (($orderBy != null) && !in_array($orderBy, $fieldsArray))
	{
		return false;
	}

	if ((strtolower($orderDirection) != 'asc') && (strtolower($orderDirection) != 'desc'))
	{
		return false;
	}

	if (($startIndex != null) && ($numRows != null))
	{
		$limit = sprintf(' LIMIT %d, %d', $startIndex, $numRows);
	}
	else if (($startIndex != null) && ($numRows == null))
	{
		$limit = sprintf(' LIMIT %d', $startIndex);
	}

	if (($orderBy != null) && ($orderDirection != null))
	{
		$order = sprintf(' ORDER BY %s %s', $orderBy, $orderDirection);
	}
	else if (($orderBy != null) && ($orderDirection == null))
	{
		$order = sprintf(' ORDER BY %s ASC ', $orderBy);
	}

	$sql = sprintf("SELECT `id`, `firstname`, `lastname`, `mail` FROM `participant` %s %s", $order, $limit);
	return $db->fetch_all_array($sql);
}
}
?>