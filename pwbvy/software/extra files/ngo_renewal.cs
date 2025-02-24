using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Pbvy_db
{
    #region Ngo_renewal
    public class Ngo_renewal
    {
        #region Member Variables
        protected int _id;
        protected string _user_id;
        protected unknown _amount;
        protected unknown _transaction_date;
        protected string _remarks;
        protected int _frequency;
        protected string _reciever_id;
        protected int _status;
        protected DateTime _added_on;
        protected int _modify_by;
        protected unknown _modify_on;
        #endregion
        #region Constructors
        public Ngo_renewal() { }
        public Ngo_renewal(string user_id, unknown amount, unknown transaction_date, string remarks, int frequency, string reciever_id, int status, DateTime added_on, int modify_by, unknown modify_on)
        {
            this._user_id=user_id;
            this._amount=amount;
            this._transaction_date=transaction_date;
            this._remarks=remarks;
            this._frequency=frequency;
            this._reciever_id=reciever_id;
            this._status=status;
            this._added_on=added_on;
            this._modify_by=modify_by;
            this._modify_on=modify_on;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string User_id
        {
            get {return _user_id;}
            set {_user_id=value;}
        }
        public virtual unknown Amount
        {
            get {return _amount;}
            set {_amount=value;}
        }
        public virtual unknown Transaction_date
        {
            get {return _transaction_date;}
            set {_transaction_date=value;}
        }
        public virtual string Remarks
        {
            get {return _remarks;}
            set {_remarks=value;}
        }
        public virtual int Frequency
        {
            get {return _frequency;}
            set {_frequency=value;}
        }
        public virtual string Reciever_id
        {
            get {return _reciever_id;}
            set {_reciever_id=value;}
        }
        public virtual int Status
        {
            get {return _status;}
            set {_status=value;}
        }
        public virtual DateTime Added_on
        {
            get {return _added_on;}
            set {_added_on=value;}
        }
        public virtual int Modify_by
        {
            get {return _modify_by;}
            set {_modify_by=value;}
        }
        public virtual unknown Modify_on
        {
            get {return _modify_on;}
            set {_modify_on=value;}
        }
        #endregion
    }
    #endregion
}