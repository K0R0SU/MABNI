import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Edit( { attributes, setAttributes } ) {
	const blockProps = useBlockProps();

	return (
		<div { ...blockProps }>
			<RichText
				tagName="h2"
				value={ attributes.heading }
				onChange={ ( val ) => setAttributes( { heading: val } ) }
				placeholder={ __( 'Add your heading…', 'mabni' ) }
			/>
			<RichText
				tagName="p"
				value={ attributes.subheading }
				onChange={ ( val ) => setAttributes( { subheading: val } ) }
				placeholder={ __( 'Add a subheading…', 'mabni' ) }
			/>
		</div>
	);
}
