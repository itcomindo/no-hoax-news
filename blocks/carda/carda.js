wp.blocks.registerBlockType('nhx/custom-block', {
    title: 'NHX Custom Block',
    icon: 'dashicons-admin-appearance',
    keyword: 'nhx',
    category: 'design',
    attributes: {
        namas: { type: 'sring' },
        phones: { type: 'sring' },
        alamats: { type: 'sring' },
        kotas: { type: 'sring' },
        provinsis: { type: 'sring' },
        zips: { type: 'sring' },
    },

    edit: function (props) {
        
        return React.createElement("div", null, /*#__PURE__*/React.createElement("label", {
  for: ""
}, "Nama Perusahaan"), /*#__PURE__*/React.createElement("input", {
  type: "text",
  value: "",
  placeholder: "Nama Perusahaan"
}), /*#__PURE__*/React.createElement("label", {
  for: ""
}, "Phone"), /*#__PURE__*/React.createElement("input", {
  type: "text",
  value: "",
  placeholder: "Phone Perusahaan"
}), /*#__PURE__*/React.createElement("label", {
  for: ""
}, "Alamat Perusahaan"), /*#__PURE__*/React.createElement("input", {
  type: "text",
  value: "",
  placeholder: "Alamat Perusahaan"
}), /*#__PURE__*/React.createElement("label", {
  for: ""
}, "Kota Perusahaan"), /*#__PURE__*/React.createElement("input", {
  type: "text",
  value: "",
  placeholder: "Kota Perusahaan"
}), /*#__PURE__*/React.createElement("label", {
  for: ""
}, "Provinsi Perusahaan"), /*#__PURE__*/React.createElement("input", {
  type: "text",
  value: "",
  placeholder: "Provinsi Perusahaan"
}), /*#__PURE__*/React.createElement("label", {
  for: ""
}, "Zip Perusahaan"), /*#__PURE__*/React.createElement("input", {
  type: "text",
  value: "",
  placeholder: "Zip Perusahaan"
}));

},
    save: function(props) {
        return null;
    }
})

