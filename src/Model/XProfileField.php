<?php
/**
 * XProfile Field Model Class
 *
 * @package WPGraphQL\Extensions\BuddyPress\Model
 * @since 0.0.1-alpha
 */

namespace WPGraphQL\Extensions\BuddyPress\Model;

use GraphQLRelay\Relay;
use WPGraphQL\Model\Model;
use BP_XProfile_Field;

/**
 * Class XProfile Field - Models the data for the XProfile Field object type.
 *
 * @property string $id
 * @property string $fieldId
 * @property string $groupId
 * @property string $parent
 * @property string $name
 * @property string $description
 * @property string $value
 * @property string $type
 * @property string $canDelete
 * @property string $isRequired
 * @property string $fieldOrder
 * @property string $optionOrder
 * @property string $memberTypes
 * @property string $orderBy
 * @property string $isDefaultOption
 * @property string $visibilityLevel
 * @property string $doAutolink
 */
class XProfileField extends Model {

	/**
	 * Stores the BP_XProfile_Field object for the incoming data.
	 *
	 * @var BP_XProfile_Field
	 */
	protected $data;

	/**
	 * XProfile field constructor.
	 *
	 * @param BP_XProfile_Field $xprofile_field The incoming BP_XProfile_Field object that needs modeling.
	 */
	public function __construct( BP_XProfile_Field $xprofile_field ) {
		$this->data = $xprofile_field;
		parent::__construct();
	}

	/**
	 * Initialize the XProfile field object.
	 */
	protected function init() {
		if ( empty( $this->fields ) ) {
			$this->fields = [
				'id' => function() {
					return ! empty( $this->data->id )
						? Relay::toGlobalId( 'xprofile_field_object', $this->data->id )
						: null;
				},
				'fieldId' => function() {
					return $this->data->id ?? null;
				},
				'groupId' => function() {
					return $this->data->group_id ?? null;
				},
				'parent' => function() {
					return $this->data->parent_id ?? null;
				},
				'name' => function() {
					return $this->data->name ?? null;
				},
				'type' => function() {
					return $this->data->type ?? null;
				},
				'canDelete' => function() {
					return $this->data->can_delete;
				},
				'isRequired'   => function() {
					return $this->data->is_required;
				},
				'fieldOrder'  => function() {
					return $this->data->field_order;
				},
				'optionOrder' => function() {
					return $this->data->option_order;
				},
				'groupOrder' => function() {
					return $this->data->group_order;
				},
				'orderBy' => function() {
					return $this->data->order_by ?? null;
				},
				'isDefaultOption' => function() {
					return $this->data->is_default_option;
				},
				'visibilityLevel' => function() {
					return $this->data->default_visibility;
				},
				'doAutolink' => function() {
					return $this->data->do_autolink;
				},
				'description' => function() {
					return $this->data->description ?? null;
				},
				'value' => function() {
					return $this->data->data->value ?? null;
				},
				'memberTypes' => function() {
					return $this->data->get_member_types() ?? null;
				},
			];
		}
	}
}
